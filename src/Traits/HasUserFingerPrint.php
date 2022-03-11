<?php

namespace Managemize\LaravelFingerprints\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static updating(\Closure $param)
 * @method static creating(\Closure $param)
 */
trait HasUserFingerPrint
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

    public static function bootHasUserFingerPrint()
    {
        $user_id = auth()->id() ?? 0;

        static::creating(function (Model $model) use (&$user_id) {
            if ($model->userFingerPrint['create'])
                $model->{$model->userFingerPrintFields['create']} = $user_id;
        });

        static::updating(function (Model $model) use (&$user_id) {
            if ((!method_exists($model, 'trashed') || !$model->trashed()) && $model->userFingerPrint['update'])
                $model->{$model->userFingerPrintFields['update']} = $user_id;
        });

        static::deleted(function (Model $model) use (&$user_id) {
            if ($model->userFingerPrint['delete']) {
                $model->{$model->userFingerPrintFields['delete']} = $user_id;
                $model->save();
            }
        });
    }
}