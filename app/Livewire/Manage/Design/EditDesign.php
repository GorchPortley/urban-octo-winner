<?php

namespace App\Livewire\Manage\Design;

use App\Models\Design;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditDesign extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Design $record;

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('card_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('cost')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Textarea::make('public_description')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('private_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('category')
                    ->required(),
                Forms\Components\TextInput::make('freq_low')
                    ->numeric(),
                Forms\Components\TextInput::make('freq_high')
                    ->numeric(),
                Forms\Components\TextInput::make('amplification')
                    ->required(),
                Forms\Components\Textarea::make('amp_details')
                    ->columnSpanFull(),
                Forms\Components\Select::make('owner_id')
                    ->relationship('owner', 'name')
                    ->required(),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);
    }

    public function render(): View
    {
        return view('livewire.manage.edit-design');
    }
}
