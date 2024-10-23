<?php

namespace App\Livewire\Manage\Design;

use App\Models\Design;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateDesign extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Public')
                ->extraAttributes(['class'=>'border-2 border-grey-light'])
                ->columns(2)
                ->collapsible()
                ->schema([
                Forms\Components\Toggle::make('status')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('card_description')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('cost')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Textarea::make('public_description')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('category')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->required(),
                Forms\Components\TextInput::make('freq_low')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->numeric(),
                Forms\Components\TextInput::make('freq_high')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->numeric(),
                Forms\Components\TextInput::make('amplification')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->required(),
                Forms\Components\Textarea::make('amp_details')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('owner_id')
                    ->default(auth()->user()->id),
            ]),
                Forms\Components\Section::make('Private')
                    ->extraAttributes(['class'=>'border-2 border-grey-light'])
                    ->schema([
                        Forms\Components\Textarea::make('private_description')
                            ->extraAttributes(['class'=>'border-2 border-grey-light'])
                            ->columnSpanFull(),])
            ])
            ->statePath('data')
            ->model(Design::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Design::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.manage.design.create-design');
    }
}