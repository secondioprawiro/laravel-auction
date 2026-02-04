@extends('layouts.app')

@section('title', 'Manage Profile - Bidding')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-8">

        <!-- Header -->
        <div>
            <h1 class="text-3xl font-black text-white">Profile <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Settings</span></h1>
            <p class="text-gray-400 mt-1">Manage your account information and security.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Profile Information -->
            <div class="p-8 bg-white/5 border border-white/10 rounded-2xl shadow-xl">
                <h3 class="text-lg font-bold text-white mb-4">Profile Information</h3>
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-8 bg-white/5 border border-white/10 rounded-2xl shadow-xl">
                <h3 class="text-lg font-bold text-white mb-4">Security</h3>
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <!-- Delete Account -->
            <div class="lg:col-span-2 p-8 bg-red-500/5 border border-red-500/20 rounded-2xl shadow-xl">
                <h3 class="text-lg font-bold text-red-500 mb-4">Danger Zone</h3>
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection