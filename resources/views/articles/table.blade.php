<table class="table table-responsive" id="articles-table">
    <thead>
        <th>Title</th>
        <th>Post Date</th>
        <th>Body</th>
        <th>Post Type</th>
        <th>Category</th>
        <th>User Id</th>
        <th>Image Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td>{!! $article->title !!}</td>
            <td>{!! $article->post_date !!}</td>
            <td>{!! $article->body !!}</td>
            <td>{!! $article->post_type !!}</td>
            <td>{!! $article->category !!}</td>
            <td>{!! $article->user_id !!}</td>
            <td>{!! $article->image_name !!}</td>
            <td>
                {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>