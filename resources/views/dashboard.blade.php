@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Profile Header & Overview -->
        <div class="col-md-4 text-center">
            <div class="profile-header">
                <!-- Profile Image -->
                <div class="mb-3">
                    <img src="{{ asset('images/profile-pic.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle" width="150">
                </div>
                <!-- Full Name -->
                <h2 class="font-weight-bold">{{ auth()->user()->name }}</h2>
                <p class="text-muted">Welcome back, {{ auth()->user()->name }}!</p>
                <!-- Loyalty Points / Membership -->
                <div class="loyalty-status">
                    <p class="font-weight-bold">Loyalty Points: 1200</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="text-muted">Gold Member</p>
                </div>
            </div>
        </div>

        <!-- Navigation & Menu -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Profile Menu</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile-details">Profile Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="order-history-tab" data-bs-toggle="tab" href="#order-history">Order History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="loyalty-tab" data-bs-toggle="tab" href="#loyalty-program">Loyalty Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="preferences-tab" data-bs-toggle="tab" href="#preferences">Preferences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="rewards-tab" data-bs-toggle="tab" href="#rewards">Rewards</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <!-- Profile Details Tab -->
                        <div class="tab-pane fade show active" id="profile-details">
                            <h5>Personal Information</h5>
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>

                        <!-- Order History Tab -->
                        <div class="tab-pane fade" id="order-history">
                            <h5>Recent Orders</h5>
                            <div class="order-card mb-3 p-3 border rounded">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('images/order-item.jpg') }}" alt="Dish Image" class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Margherita Pizza</h6>
                                        <p>Date: 2024-10-25</p>
                                        <p>Total: $15.99</p>
                                        <button class="btn btn-sm btn-outline-primary">Reorder</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more orders here -->
                        </div>

                        <!-- Loyalty Program Tab -->
                        <div class="tab-pane fade" id="loyalty-program">
                            <h5>Loyalty Status</h5>
                            <p>Your current points: 1200</p>
                            <p>Next level: Gold (2000 points needed)</p>
                            <!-- Progress Bar and Offers -->
                            <div class="progress mb-3">
                                <div class="progress-bar" style="width: 60%" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <button class="btn btn-outline-secondary">View Rewards</button>
                        </div>

                        <!-- Preferences Tab -->
                        <div class="tab-pane fade" id="preferences">
                            <h5>Dietary Preferences</h5>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="vegan">
                                    <label class="form-check-label" for="vegan">Vegan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="gluten-free">
                                    <label class="form-check-label" for="gluten-free">Gluten-Free</label>
                                </div>
                                <button class="btn btn-primary mt-3">Save Preferences</button>
                            </form>
                        </div>

                        <!-- Rewards Tab -->
                        <div class="tab-pane fade" id="rewards">
                            <h5>Your Rewards</h5>
                            <p>Earn points with each order to unlock amazing rewards.</p>
                            <!-- Example Rewards -->
                            <div class="reward-card mb-3 p-3 border rounded">
                                <h6>Free Dessert - 500 Points</h6>
                                <button class="btn btn-sm btn-success">Redeem</button>
                            </div>
                            <!-- Add more rewards -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

