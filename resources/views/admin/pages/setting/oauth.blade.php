<div class="mg-b-10">
    <h5><b>API Access Token</b></h5>
</div>

<div>

    <div class="form-group">
        <label class="d-block"><b>Access Token</b></label>
        <textarea class="form-control" id="" cols="30" rows="12" disabled>{{auth()->user()->createToken('Token Name')->accessToken}}</textarea>
    </div>

   

</div>
