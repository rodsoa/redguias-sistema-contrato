<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Models\Tables\Config;

class CreatePrimaryAndSecondaryEmails extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Config::create([
            'primary_email' => 'financeiro@redguiasapp.com.br',
            'secondary_email' => 'contato@redguiasapp.com.br'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        $emails = Config::all();
        foreach ($emails as $email) {
            $email->forceDelete();
        }
    }
}
