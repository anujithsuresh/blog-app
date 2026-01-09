@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-10">

        <!-- Profile Banner -->
        <div class="profile-banner rounded-4 p-5 mb-5 shadow-lg text-white">
            <div class="d-flex align-items-center gap-4">
                <div class="avatar-circle">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <h3 class="fw-bold mb-1">{{ auth()->user()->name }}</h3>
                    <p class="mb-0 opacity-75">
                        {{ auth()->user()->email }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Profile Sections -->
        <div class="profile-section">

            <!-- Update Profile -->
            <div class="settings-card mb-4">
                <div class="settings-icon bg-primary">
                    ⚙️
                </div>
                <div class="settings-content">
                    <h5 class="fw-semibold mb-3">Profile Information</h5>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Change Password -->
            <div class="settings-card mb-4">
                <div class="settings-icon bg-warning">
                    🔐
                </div>
                <div class="settings-content">
                    <h5 class="fw-semibold mb-3">Change Password</h5>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="settings-card danger-card">
                <div class="settings-icon bg-danger">
                    🗑️
                </div>
                <div class="settings-content">
                    <h5 class="fw-semibold text-danger mb-3">
                        Delete Account
                    </h5>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Styling -->
<style>
    .profile-banner {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
    }

    .avatar-circle {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: bold;
    }

    .settings-card {
        display: flex;
        gap: 24px;
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.08);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .settings-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(0,0,0,0.12);
    }

    .settings-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        color: #fff;
        font-size: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .settings-content {
        flex-grow: 1;
    }

    .danger-card {
        border-left: 6px solid #dc3545;
    }
</style>

@endsection
