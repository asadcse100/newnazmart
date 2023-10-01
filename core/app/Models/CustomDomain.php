<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Stancl\Tenancy\Contracts\SyncMaster;
use Stancl\Tenancy\Database\Concerns\CentralConnection;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;

class CustomDomain extends Model implements SyncMaster
{
    use HasFactory,ResourceSyncing, CentralConnection;

    protected $table = 'custom_domains';
    protected $fillable = ['user_id','old_domain','custom_domain','unique_key','custom_domain_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class, 'old_domain', 'id');
    }

    public function getTenantModelName(): string
    {
        return 'CustomDomain';
        // TODO: Implement getTenantModelName() method.
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'unique_key';
        // TODO: Implement getGlobalIdentifierKeyName() method.
    }

    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getCentralModelName(): string
    {
        return static::class;
        // TODO: Implement getCentralModelName() method.
    }

    public function getSyncedAttributeNames(): array
    {
        return ['unique_key'];
        // TODO: Implement getSyncedAttributeNames() method.
    }

    public function triggerSyncEvent()
    {
        return null;
        // TODO: Implement triggerSyncEvent() method.
    }
}
