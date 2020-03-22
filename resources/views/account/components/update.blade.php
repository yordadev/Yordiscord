<div class="modal fade login-modal" id="update{{ $server->server_id }}Modal" tabindex="-1" role="dialog" aria-labelledby="update{{ $server->server_id }}ModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="update{{ $server->server_id }}ModalLabel">
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
                <form action="{{ route('update.server') }}" method="POST" class="mt-0">
                    @csrf
                    <input type="hidden" value="{{ $server->name }}" name="name" id="name">
                    <div class="form-group">
                        <p>Write a <code>short</code> public description <code>introducing</code> your server.</p>
                        <label for="description" class="sr-only">Server Description</label>
                        <input type="text" class="form-control" id="description" name="description" aria-describedby="description" value="{{ $server->description }} ">
                    </div>
                    <div class="form-group">
                        <p>Enter a valid <code>invite code</code> to your server.</p>
                        <label for="tags" class="sr-only">Invite Code</label>
                        <input type="text" class="form-control" id="code" name="code" aria-describedby="code"  value="{{ $server->code }}">
                        <div class="mt-1">
                            <span class="badge badge-info">
                                <small id="stags" class="form-text mt-0">For information on how to get this, see <b>this article</b>.</small>
                            </span>
                        </div>
                     
                    </div>
                    <div class="form-group">
                        <p>Add <code>tags</code> to your server to help <code>others</code> find it.</p>
                        <label for="tags" class="sr-only">Server Tags</label>
                        <input type="hidden" value="{{ $server->server_id }}" id="server_id" name="server_id">
                        <input type="hidden" value="{{ $server->name}}" id="tags" name="tags">
                        {{ $tag = ''}}
                        @foreach($server->tags as $record)
                            {{ $tag = $record->tag . ' ' . $tag }}
                        @endforeach
                        <input type="text" class="form-control" id="tags" name="tags" aria-describedby="tags" value="{{ $tag }}">
                        <div class="mt-1">
                            <span class="badge badge-info">
                                <small id="stags" class="form-text mt-0">Seperate the Tags with <b>SPACES</b>.</small>
                            </span>
                        </div>
                        <div class="mt-1">
                            <span class="badge badge-warning">
                                <small id="stags" class="form-text mt-0">Only (3) Three Tags Allowed.</small>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Update the Server</button>
                </form>
            </div>
            
        </div>
    </div>
</div>