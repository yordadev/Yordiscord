<div class="modal fade login-modal" id="joinServer{{ $server->server_id }}Modal" tabindex="-1" role="dialog" aria-labelledby="joinServerModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="joinServerModalLabel">
                <h4 class="modal-title">{{ $server->name }} Listing</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('join.server', ['server_id' => $server->server_id]) }}" target="_blank" method="POST" class="mt-0">
                    @csrf
                    <input type="hidden" value="{{ $server->server_id}}" name="server_id" id="server_id">
                   
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Join this Server</button>
                </form>
            </div>
            
        </div>
    </div>
</div>