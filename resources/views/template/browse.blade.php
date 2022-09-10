<div class="row input-group my-4 d-flex justify-content-center">
    <form class="d-flex" action="/search" method="GET" style="width: 70%">
        <input type="text" class="form-control ps-2 me-2" placeholder="Search" name="title" value="{{isset($keyword) ? $keyword : ''}}">
        <button class="btn btn-secondary" type="submit">SEARCH</button>
    </form>
</div>