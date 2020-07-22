<?php

namespace App\Empresa\Rules;

use App\Empresa\ManagerEmpresa;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueEmpresa implements Rule
{

    protected $table, $value, $collumn;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $table, $value = null, $collumn = 'id')
    {
        $this->table = $table;
        $this->value = $value;
        $this->collumn = $collumn;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $empresaId = app(ManagerEmpresa::class)->getEmpresaIdentificacao();

        $register = DB::table($this->table)
            ->where($attribute, $value)
            ->where('empresa_id', $empresaId)
            ->first();

        if ($register && $register->{$this->collumn} == $this->value)
            return true;

        return is_null($register);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O valor para :attribute já está em uso!';
    }
}
