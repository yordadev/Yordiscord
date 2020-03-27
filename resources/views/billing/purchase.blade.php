<div class="modal fade" id="purchase{{ $plan['id'] }}Modal" tabindex="-1" role="dialog" aria-labelledby="purchase{{ $plan['id'] }}ModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="purchase{{ $plan['id'] }}ModalTitle"> {{ $plan['nickname'] }} Boost Pack</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="{{ route('submit.payment') }}">
                @csrf
                <div class="row mb-3">
                  <div class="col">
                      <label>Card Number</label>
                    <input type="text" class="form-control" placeholder="Card Number">
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Expire Year</label>
                      <input type="text" class="form-control" placeholder="Month">
                    </div>
                    <div class="col">
                        <label>Expire Year</label>
                      <input type="text" class="form-control" placeholder="Year">
                    </div>
                    <div class="col">
                        <label>Security Code</label>
                        <input type="text" class="form-control" placeholder="CVC">
                      </div>
                  </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>