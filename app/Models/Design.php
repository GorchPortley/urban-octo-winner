<?php

namespace App\Models;

use App\Livewire\FileBrowser;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Set;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class Design extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'name',
        'card_description',
        'price',
        'cost',
        'public_description',
        'private_description',
        'category',
        'freq_low',
        'freq_high',
        'amplification',
        'amp_details',
        'owner_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'double',
        'cost' => 'double',
        'freq_low' => 'double',
        'freq_high' => 'double',
        'owner_id' => 'integer',
    ];

    public static function getForm(): array
    {
        return [
            Section::make('Public Design Details')
                ->columns(2)
                ->collapsible()
                ->description('These details will be visible to everyone.')
                ->schema([
                    Toggle::make('status')
                        ->required()
                        ->helperText('Whether or not the design is available for purchase.'),
                    TextInput::make('name')
                        ->live()
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->helperText('The name of the design.'),
                    TextInput::make('price')
                        ->numeric()
                        ->prefix('$')
                        ->helperText('The selling price of the design.'),
                    TextInput::make('cost')
                        ->numeric()
                        ->prefix('$')
                        ->helperText('The estimated build cost of the design.'),
                    Textarea::make('card_description')
                        ->columnSpanFull()
                        ->helperText('A short description of the design.'),
                    RichEditor::make('public_description')
                        ->columnSpanFull()
                        ->helperText('A description of the design that will be visible on the listing.'),
                    Select::make('category')
                        ->helperText('What kind of design is this?')
                        ->options([
                            'Subwoofer' => 'Subwoofer',
                            'Full-Range' => 'Full-Range',
                            'Two-Way' => 'Two-Way',
                            'Three-Way' => 'Three-Way',
                            'Four-Way' => 'Four-Way +',
                            'Portable' => 'Portable',
                            'Esoteric' => 'Esoteric',
                            'Upgrades' => 'Upgrades',
                        ])
                        ->required(),
                    TextInput::make('freq_low')
                        ->helperText('The lowest frequency (f3) that the design can be used at.')
                        ->numeric(),
                    TextInput::make('freq_high')
                        ->helperText('The highest frequency (f3) that the design can be used at.')
                        ->numeric(),
                    Select::make('amplification')
                        ->options(['Active' => 'Active', 'Passive' => 'Passive', 'Hybrid' => 'Hybrid'])
                        ->helperText('What powers the design?')
                        ->required(),
                    Textarea::make('amp_details')
                        ->helperText('More details about the amplification i.e Minimum Impedance, Power Handling'),
                ]),
            Section::make('Private Design Details')
                ->description('These details will only be visible to subscribers.')
                ->collapsible()
                ->collapsed()
                ->schema([
                    RichEditor::make('private_description')
                        ->helperText('The main write-up for your design available to subscribers only, this can be simple text or full HTML!')
                        ->columnSpanFull(),
                    Livewire::make(FileBrowser::class),
                    Section::make('Components')
                        ->collapsible()
                        ->collapsed()
                        ->description('Add the components that make up your design.')
                        ->schema([
                            Repeater::make('components')
                                ->defaultItems(0)
                                ->itemLabel(fn (array $state): ?string => ($state['position'] ?? '') . ' : ' . ($state['freq_low'] ?? '') . ' - ' . ($state['freq_hi'] ?? ''))
                                ->collapsible()
                                ->collapsed()
                                ->relationship()
                                ->schema(Component::getForm()),
                            Hidden::make('owner_id')
                                ->default(auth()->user()->id)
                                ->required(),
                        ]),
                ]),
        ];
    }

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
