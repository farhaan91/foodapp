@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h4 class="text-center py-4">Admin Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/#banner-management">Banner Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#team-management">Team Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#menu-management">Menu Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#order-management">Order Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#feedback-reviews">Feedback/Reviews</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="text-center mt-5">Admin Dashboard</h2>

                <!-- Banner Management Section -->
                <section id="banner-management" class="py-5">
                    <h3>Banner Management</h3>
                    <p>Manage homepage banners. Update images and text, and add or delete banners.</p>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBannerModal">Add New Banner</button>
                    <!-- Banner list with Edit/Delete options -->
                    <div class="card mb-3">
                        <img src="https://via.placeholder.com/800x200" class="card-img-top" alt="Banner Image">
                        <div class="card-body">
                            <h5 class="card-title">Banner Text</h5>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <!-- Add Banner Modal -->
                    <div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addBannerModalLabel">Add New Banner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="bannerImage">Banner Image</label>
                                            <input type="file" class="form-control-file" id="bannerImage">
                                        </div>
                                        <div class="form-group">
                                            <label for="bannerText">Banner Text</label>
                                            <input type="text" class="form-control" id="bannerText">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Banner</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
<!-- Filter Form -->
<form method="GET" action="{{ route('dash') }}" class="mb-4">
    <div class="form-row align-items-center">
        <label for="status" class="col-sm-2 col-form-label">Filter by Status:</label>
        <div class="col-sm-4">
            <select name="status" id="status" class="form-control">
                <option value="">All</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary col-sm-2">Filter</button>
    </div>
</form>

<!-- Bookings Table -->
<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reservation Date</th>
            <th>Reservation Time</th>
            <th>Number of People</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->full_name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->phone_number }}</td>
                <td>{{ $booking->reservation_date }}</td>
                <td>{{ $booking->reservation_time }}</td>
                <td>{{ $booking->number_of_people }}</td>
                <td>
                    <!-- Conditional Status Coloring -->
                    <span class="badge 
                        @if($booking->status == 'approved') badge-success text-dark 
                        @elseif($booking->status == 'pending') badge-warning text-dark 
                        @elseif($booking->status == 'canceled') badge-danger text-white 
                        @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

                <!-- Team Management Section -->
                <section id="team-management" class="py-5">
                    <h3>Team Management</h3>
                    <button class="btn btn-primary mb-3">Add Team Member</button>
                    <div class="card-deck">
                        <!-- Team Member Card 1 -->
                        <div class="card text-center">
                            <img src="https://via.placeholder.com/150" class="card-img-top rounded-circle mx-auto mt-3" style="width:100px; height:100px;" alt="Team Member">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text">Chef</p>
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                        <!-- Add more team members as needed -->
                    </div>
                </section>

                <!-- Menu Management Section -->
                <section id="menu-management" class="py-5">
                    <h3>Menu Management</h3>
                    <button class="btn btn-primary mb-3">Add Menu Item</button>
                    <div class="row">
                        <!-- Menu Item 1 -->
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Menu Item">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Pasta Alfredo</h5>
                                    <p>$12.99</p>
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                        <!-- Add more menu items as needed -->
                    </div>
                </section>

                <!-- Order Management Section -->
                <section id="order-management" class="py-5">
                    <h3>Order Management</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Jane Smith</td>
                                <td>Preparing</td>
                                <td>
                                    <button class="btn btn-success">Mark as Delivered</button>
                                    <button class="btn btn-danger">Cancel</button>
                                </td>
                            </tr>
                            <!-- Add more orders as needed -->
                        </tbody>
                    </table>
                </section>

                <!-- Feedback/Reviews Section -->
                <section id="feedback-reviews" class="py-5">
                    <h3>Customer Feedback & Reviews</h3>
                    <div class="list-group">
                        <div class="list-group-item">
                            <p>"Great food, enjoyed the ambiance!" - <strong>Anna</strong></p>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
@endsection
