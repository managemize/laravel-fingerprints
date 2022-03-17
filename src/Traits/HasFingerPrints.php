<?php

namespace Managemize\LaravelFingerprints\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static updating(\Closure $param)
 * @method static creating(\Closure $param)
 */
trait HasFingerPrints
{
    protected array $userFingerPrintFields = [
        'create' => 'created_by',
        'update' => 'updated_by',
        'delete' => 'deleted_by',
    ];

    protected array $userFingerPrint = [
        'create' => true,
        'update' => true,
        'delete' => true,
    ];

    public static function bootHasFingerPrints()
    {
        static::creating(function (Model $model) {
            if ($model->userFingerPrint['create'] && auth()->id())
                $model->{$model->userFingerPrintFields['create']} = auth()->id();
        });

        static::updating(function (Model $model)  {
            if ((!method_exists($model, 'trashed') || !$model->trashed()) && $model->userFingerPrint['update'] && auth()->id())
                $model->{$model->userFingerPrintFields['update']} = auth()->id();
        });

        static::deleted(function (Model $model) {
            if ($model->userFingerPrint['delete'] && auth()->id()) {
                $model->{$model->userFingerPrintFields['delete']} = auth()->id();
                $model->save();
            }
        });
    }
}