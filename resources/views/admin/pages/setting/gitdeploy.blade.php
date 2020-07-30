<div class="mg-b-10">
    <h5><b>Github Deploy</b></h5>
</div>

<div>

    <form method="POST" action="{{route('setting.store',['type'=>'github'])}}">
        @csrf
        <div>
            <input type="checkbox" name="autodeploy"  {{setting('app.autogitdeploy') == 'true' ? 'checked' : null}}>
            <label for="">Auto deploy from git push</label>
        </div>
        <button class="btn btn-primary btn-xs">Save</button>
        <a href="{{route('git.deploy',['type'=>'github'])}}" class="btn btn-dark btn-xs">Deploy From Github Manually</a>
    </form>



</div>
