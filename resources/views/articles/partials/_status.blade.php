<!-- Draft -->
@if ($article->isDraft())
    <a href="#" >
        <i class="fa fa-question-circle fa-2x" aria-hidden="true" style="color: #BF5329"></i>
    </a>
@endif

<!-- Published -->
@if ($article->isPublished())
    <a href="#">
        <i class="fa fa-check-circle fa-2x" aria-hidden="true"  style="color: lightgreen"></i>
    </a>
@endif

<!-- Not Published -->
@if ($article->isNotPublished())
    <a href="#">
        <i class="fa fa-calendar fa-lg" aria-hidden="true"  style="color: #CBB956"></i>
    </a>
@endif

<p style="margin-bottom: 0;">
    <a href="#" data-toggle="modal" data-target="#statusModal">
        Update
    </a>
</p>

<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background: #305369; border-bottom: 6px solid #8eb4cb">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="statusModalLabel" style="color: #fff">
                    <b><i class="fa fa-pencil-square-o"></i> Update status</b>
                </h4>
            </div>

            <div class="modal-body"  style="padding: 40px 10px">
                <form action="{{ $article->path('status') }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <!-- Status -->
                    <div class="form-group" style="margin-bottom: 0;">
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{ selected(0, $article->status) }}>Draft</option>
                            <option value="1">Publish</option>
                            <option disabled {{ selected(1, $article->status) }}>Published</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer" >
                    <button type="button" id="modal-save" class="btn btn-info pull-right" style="margin-left: 5px;">Save changes</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>

</div>