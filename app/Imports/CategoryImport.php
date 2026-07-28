<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
         $renamedImages = [];
         
        foreach ($rows as $row) {

            if (empty($row['name'])) {
                continue;
            }

            $parentId = null;

            if (!empty($row['parent_category'])) {

                $parent = Category::where(
                    'name',
                    trim($row['parent_category'])
                )->first();

                $parentId = $parent?->id;
            }

            $exists = Category::where(
                'name',
                trim($row['name'])
            )->first();

            if ($exists) {
                continue;
            }

            $image = null;

if (!empty($row['image_name'])) {

    $oldImageName = trim($row['image_name']);

    // image already renamed before
    if (isset($renamedImages[$oldImageName])) {

        $image = $renamedImages[$oldImageName];

    } else {

        $oldPath = 'categories/' . $oldImageName;

        if (Storage::disk('public')->exists($oldPath)) {

            $extension = pathinfo(
                $oldImageName,
                PATHINFO_EXTENSION
            );

            $newImageName =
                Str::slug(trim($row['name'])) . '.' . $extension;

            $newPath = 'categories/' . $newImageName;

            if (!Storage::disk('public')->exists($newPath)) {

                Storage::disk('public')->move(
                    $oldPath,
                    $newPath
                );
            }

            $image = $newPath;

            $renamedImages[$oldImageName] = $newPath;
        }
    }
}

$slug = Str::slug(trim($row['name']));
$originalSlug = $slug;
$count = 1;

while (
    Category::where('slug', $slug)->exists()
) {
    $slug = $originalSlug . '-' . $count;
    $count++;
}
            Category::create([
                'name' => trim($row['name']),

                'sub_title' => $row['sub_title'] ?? null,

                'slug' => $slug,

                'meta_title' => $row['meta_title'] ?? null,
                'meta_description' => $row['meta_description'] ?? null,

                'image' => $image,

                'parent_id' => $parentId,

                'is_popular' => !empty($row['is_popular']) ? 1 : 0,
                'is_featured' => !empty($row['is_featured']) ? 1 : 0,
                'show_on_website' => !empty($row['show_on_website']) ? 1 : 0,

                'is_sub_category' => $parentId ? 1 : 0,

                'added_by' => $row['added_by'] ?? 'admin',

                'status' =>  1,

                'sort_order' => $row['sort_order'] ?? 0,
            ]);
        }
    }
}