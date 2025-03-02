<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Coffee Listings</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/coffee-listings/create') }}" class="btn btn-success btn-sm" title="Add New Coffee Listing">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/><br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Stock Quantity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>