<div class="col-lg-3 col-md-12">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}">
                                <a href="user-dashboard.html">Dashboard</a>
                            </li>

                            

                            <li class="list-group-item">
                                <a href="user-order.html">Orders</a>
                            </li>
                            <li class="list-group-item">
                                <a href="user-wishlist.html">Wishlist</a>
                            </li>
                            <li class="list-group-item">
                                <a href="user-message.html">Message</a>
                            </li>
                            <li class="list-group-item">
                                <a href="user-review.html">Reviews</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('user.profile') }}">Edit Profile</a>
                            </li>
                            <li class="list-group-item {{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}">
                                <a href="{{ route('user.logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>