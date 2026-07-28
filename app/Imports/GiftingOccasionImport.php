<?php

namespace App\Imports;

use App\Models\GiftingOccasion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GiftingOccasionImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $renamedImages = [];
        foreach ($rows as $row) {

            if (empty($row['title'])) {
                continue;
            }

            $exists = GiftingOccasion::where(
                'title',
                trim($row['title'])
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

        $oldPath = 'gifting/' . $oldImageName;

        if (Storage::disk('public')->exists($oldPath)) {

            $extension = pathinfo(
                $oldImageName,
                PATHINFO_EXTENSION
            );

            $newImageName =
                Str::slug(trim($row['name'])) . '.' . $extension;

            $newPath = 'gifting/' . $newImageName;

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
$slug = Str::slug(trim($row['title']));
$originalSlug = $slug;
$count = 1;

while (
    Category::where('slug', $slug)->exists()
) {
    $slug = $originalSlug . '-' . $count;
    $count++;
}

            GiftingOccasion::create([
                'title' => trim($row['title']),

                'sub_title' => $row['sub_title'] ?? null,

                'short_description' => $row['short_description'] ?? null,

                'slug' => $slug,

                'meta_title' => $row['meta_title'] ?? null,

                'meta_description' => $row['meta_description'] ?? null,

                'icon' => $row['icon'] ?? null,

                'image' => $image,

                'status' =>  1,
            ]);
        }
    }
}