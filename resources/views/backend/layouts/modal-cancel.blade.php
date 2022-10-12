<script type="text/javascript">
    function confirm_cancel_modal(cancel_url) {
        jQuery('#confirm_cancel').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('cancel_link').setAttribute('href', cancel_url);
    }
</script>
<div class="modal fade" id="confirm_cancel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cancel Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{__('Order cancel confirmation message')}}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                <a id="cancel_link" class="btn btn-danger btn-ok">{{__('Confirm')}}</a>
            </div>
        </div>
    </div>
</div>