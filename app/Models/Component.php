<?php

namespace App\Models;

use App\Livewire\FileBrowser;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'description',
        'freq_low',
        'freq_hi',
        'FRD',
        'ZMA',
        'Other',
        'bl',
        'mms',
        'cms',
        'rms',
        'le',
        're',
        'sd',
        'fs',
        'qes',
        'qms',
        'qts',
        'vas',
        'xmax',
        'xlim',
        'pe',
        'vd',
        'spl',
        'design_id',
        'driver_id',
    ];

    public static function getForm(): array
    {
        return [
            Select::make('position')
                ->label('Position')
                ->live()
                ->options(['LF' => 'LF', 'MF' => 'MF', 'HF' => 'HF', 'Other' => 'Other']),
            Select::make('driver_id')
                ->searchable()
                ->placeholder('Search for and select a driver')
                ->label('Driver')
                ->options(
                    Driver::where('status',1)->select('id', 'brand', 'model')->get()->mapWithKeys(function ($driver) {
                        return [$driver->id => $driver->brand . ' ' . $driver->model];
                    })
                ),
            RichEditor::make('description'),
            TextInput::make('freq_low')
                ->numeric()
                ->live()
                ->required(),
            TextInput::make('freq_hi')
                ->numeric()
                ->live()
                ->required(),
            Section::make('T/S Parameters')
                ->columns(2)
                ->collapsible()
                ->collapsed()
                ->description('Add your specific drivers parameters (not manufacturer provided parameters)')
                ->schema([
                    TextInput::make('bl')
                        ->suffix('Tm')
                        ->numeric(),
                    TextInput::make('mms')
                        ->suffix('g')
                        ->numeric(),
                    TextInput::make('cms')
                        ->suffix('M/N')
                        ->numeric(),
                    TextInput::make('rms')
                        ->suffix('N·s/m')
                        ->numeric(),
                    TextInput::make('le')
                        ->suffix('mH')
                        ->numeric(),
                    TextInput::make('re')
                        ->suffix('Ω')
                        ->numeric(),
                    TextInput::make('sd')
                        ->suffix('cm²')
                        ->numeric(),
                    TextInput::make('fs')
                        ->suffix('Hz')
                        ->numeric(),
                    TextInput::make('qes')
                        ->numeric(),
                    TextInput::make('qms')
                        ->numeric(),
                    TextInput::make('qts')
                        ->numeric(),
                    TextInput::make('vas')
                        ->suffix('L')
                        ->numeric(),
                    TextInput::make('xmax')
                        ->suffix('mm')
                        ->numeric(),
                    TextInput::make('xlim')
                        ->suffix('mm')
                        ->numeric(),
                    TextInput::make('pe')
                        ->suffix('W')
                        ->numeric(),
                    TextInput::make('vd')
                        ->suffix('cm²')
                        ->numeric(),
                    TextInput::make('spl')
                        ->suffix('dB')
                        ->numeric(),
                ]),
        ];
    }

    protected $casts = [
        'id' => 'integer',
        'freq_low' => 'double',
        'freq_hi' => 'double',
        'FRD' => 'array',
        'ZMA' => 'array',
        'Other' => 'array',
        'bl' => 'double',
        'mms' => 'double',
        'cms' => 'double',
        'rms' => 'double',
        'le' => 'double',
        're' => 'double',
        'sd' => 'double',
        'fs' => 'double',
        'qes' => 'double',
        'qms' => 'double',
        'qts' => 'double',
        'vas' => 'double',
        'xmax' => 'double',
        'xlim' => 'double',
        'pe' => 'double',
        'vd' => 'double',
        'spl' => 'double',
        'design_id' => 'integer',
        'driver_id' => 'integer',
    ];

    public function design(): BelongsTo
    {
        return $this->belongsTo(Design::class);
    }

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class);
    }


}

