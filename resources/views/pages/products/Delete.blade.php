<!-- Deleted inFormation product -->
<div class="modal fade" id="Delete_product{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete
                    Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <h5 style="font-family: 'Cairo', sans-serif;">Do you want to delete the product</h5>
                    <input type="text" readonly value="{{ $product->name }}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button class="btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
