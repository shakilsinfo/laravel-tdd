<script type="text/javascript">
    function confirm_modal(delete_url) {
        jQuery('#confirm-delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('action', delete_url);
    }
</script>
<div class="modal fade" id="confirm-delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Delete confirmation message') }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                <form id="delete_link" method="post">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button class="btn btn-danger btn-ok">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
