<?php

namespace App\Traits;

class PutResource
{
    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        // Allow binding with no existing model for PUT method
        if(\Request::isMethod('PUT')) {
            return (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this)) ? $this->withTrashed() : $this)->firstOrNew([$field ?? $this->getRouteKeyName() => $value]);
        } else {
            return $this->where($field ?? $this->getRouteKeyName(), $value)->first();
        }
    }
}
