<div class="row">
    @if (session('success'))
        <div class="col-sm-6 col-md-6 mt-4 ml-auto mr-auto">
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong>
                <hr class="message-inner-separator">
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
</div>