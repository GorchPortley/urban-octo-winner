@extends('layouts.app')

@section('content')
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#designs" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Designs</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#drivers" type="button" role="tab" aria-controls="settings" aria-selected="false">Drivers</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contests" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contests</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="designs" role="tabpanel" aria-labelledby="designs-tab">design</div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="drivers" role="tabpanel" aria-labelledby="drivers-tab">Driver Form</div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contests" role="tabpanel" aria-labelledby="contests-tab"></div>
    </div>
@endsection
