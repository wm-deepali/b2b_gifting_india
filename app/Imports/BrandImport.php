<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class BrandImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $renamedImages = [];
        foreach ($rows as $row) {

            if (empty($row['name'])) {
                continue;
            }

            $exists = Brand::where(
                'name',
                trim($row['name'])
            )->first();

            if ($exists) {
                continue;
            }

          
   $logo = null;

if (!empty($row['logo_name'])) {

    $oldImageName = trim($row['logo_name']);

    // image already renamed before
    if (isset($renamedImages[$oldImageName])) {

        $logo = $renamedImages[$oldImageName];

    } else {

        $oldPath = 'brands/' . $oldImageName;

        if (Storage::disk('public')->exists($oldPath)) {

            $extension = pathinfo(
                $oldImageName,
                PATHINFO_EXTENSION
            );

            $newImageName =
                Str::slug(trim($row['name'])) . '.' . $extension;

            $newPath = 'brands/' . $newImageName;

            if (!Storage::disk('public')->exists($newPath)) {

                Storage::disk('public')->move(
                    $oldPath,
                    $newPath
                );
            }

            $logo = $newPath;

            $renamedImages[$oldImageName] = $newPath;
        }
    }
}

            $brand = Brand::create([
                'name' => trim($row['name']),
                'logo' => $logo,
                'status' =>  1,
            ]);

            if (!empty($row['categories'])) {

                $categoryIds = [];

                $categories = explode(
                    ',',
                    $row['categories']
                );

                foreach ($categories as $catName) {

                    $category = Category::where(
                        'name',
                        trim($catName)
                    )->first();

                    if ($category) {
                        $categoryIds[] = $category->id;
                    }
                }

                $brand->categories()->sync(
                    $categoryIds
                );
            }
        }
    }
}