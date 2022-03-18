<?php

namespace Managemize\LaravelFingerprints\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static updating(\Closure $param)
 * @method static creating(\Closure $param)
 */
trait HasFingerPrints
{
    protected array $fingerPrintFields = [
        'create' => 'created_by',
        'update' => 'updated_by',
        'delete' => 'deleted_by',
    ];

    protected array $fingerPrints = [
        'create' => true,
        'update' => true,
        'delete' => true,
    ];

    public static function bootHasFingerPrints()
    {
        static::creating(function (Model $model) {
            if (auth()->id() && $model->fingerPrints['create']) {
                $model->{$model->fingerPrintFields['create']} = auth()->id();
            }
        });

        static::updating(function (Model $model)  {
            if ( auth()->id() && $model->fingerPrints['update'] && (!method_exists($model, 'trashed') || !$model->trashed())) {
                $model->{$model->fingerPrintFields['update']} = auth()->id();
            }
        });

        static::deleted(function (Model $model) {
            if (auth()->id() && $model->fingerPrints['delete']) {
                $model->{$model->fingerPrintFields['delete']} = auth()->id();
                $model->save();
            }
        });
    }
}