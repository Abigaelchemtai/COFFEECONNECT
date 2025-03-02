
<div class="card">
  <div class="card-header">Add New Coffee Listing</div>
  <div class="card-body">
      
      <form action="{{ url('coffee-listings') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Description</label></br>
        <textarea name="description" id="description" class="form-control"></textarea></br>
        <label>Price</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>
        <label>Stock Quantity</label></br>
        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control"></br>
        <label>Status</label></br>
        <select name="status" id="status" class="form-control">
            <option value="available">Available</option>
            <option value="sold_out">Sold Out</option>
        </select></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
