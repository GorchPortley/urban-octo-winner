<?php

namespace App\Models;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Driver extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'brand',
        'model',
        'nominal_size',
        'nominal_impedance',
        'description',
        'card_description',
        'mfg_url',
        'mfg_price',
        'category',
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
        'owner_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mfg_price' => 'double',
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
        'owner_id' => 'integer',
    ];

    public static function getBrands(): array
    {
        return DB::table('drivers')
            ->select('brand')
            ->distinct()
            ->pluck('brand')
            ->toArray();
    }
    public static function getForm(): array {
        return [
            Section::make('Driver Information')
            ->collapsible()
            ->description('Enter Details about the Driver')
            ->schema([

                Toggle::make('status')
                    ->required()
                    ->helperText('Whether or not the design is available for purchase.'),
                TextInput::make('brand')
                    ->datalist(Driver::getBrands())
                    ->helperText('Manufacturer of the Driver')
                    ->required()
                    ->maxLength(255),
                TextInput::make('model')
                    ->helperText('Model name of the Driver')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nominal_size')
                    ->suffix('Inches')
                    ->helperText('Nominal size of the Driver')
                    ->required()
                    ->numeric(),
                TextInput::make('nominal_impedance')
                    ->suffix('Ω')
                    ->helperText('Nominal impedance of the Driver')
                    ->required()
                    ->numeric(),
                Textarea::make('card_description')
                    ->helperText('Short description of the Driver')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->helperText('Description of the Driver i.e Cone material, Voice-coil material etc. can be simple text or full HTML!')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('mfg_url')
                    ->url()
                    ->helperText('URL of the driver')
                    ->maxLength(255),
                TextInput::make('mfg_price')
                    ->prefix('$')
                    ->helperText('MSRP of the driver')
                    ->numeric(),
                Select::make('category')
                    ->helperText('Driver type')
                    ->options(["Subwoofer"=>"Subwoofer","Woofer"=>"Woofer","Midrange"=>"Midrange","Coaxial"=>"Coaxial","Tweeter"=>"Tweeter","Compression_Driver"=>"Compression Driver","Exciter"=>"Exciter"])
                    ->required(),
                ]),
            Section::make('T/S Parameters')
                ->collapsible()
                ->collapsed()
                ->description('Add manufacturer specified parameters')
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
            Hidden::make('owner_id')
                ->default(function () {
                    return Auth::id();
                })
                ->required(),
        ];
    }

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(Component::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
