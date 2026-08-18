<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkLogisticsSetting extends Model
{
    protected $fillable = ['content'];

    /**
     * Singleton accessor — hamesha ek hi row (id = 1) use hogi.
     */
    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'content' => '<h4>Direct-to-Employee Shipping Logistics</h4>
<p>Managing onboarding logistics for distributed or remote teams is challenging. That\'s why B2B Gifts India offers end-to-end direct-to-employee dispatch logistics.</p>
<ul>
<li><strong>Free Warehousing</strong> — Buy welcome kits in volume discounts and store them in our secure cleanrooms. We ship them individually as your new employees join.</li>
<li><strong>Bulk Freight Dispatch</strong> — Freight shipping of assembled kits directly to your headquarters or regional office locations. Palletized and fully insured transit.</li>
<li><strong>PAN India Delivery</strong> — Express tracked shipments across 19,000+ PIN codes inside India with dashboard tracking and instant delivery confirmation.</li>
</ul>',
            ]
        );
    }
}