<!-- Modal -->
<div class="modal fade" id="subject_create_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">新建专题</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">*名称:</label>
            <input type="text" class="form-control" id="recipient-name" placeholder="必填">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">描述:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> 是否公开
            </label>
          </div>
          <div class="form-group">
            <input type="file" id="exampleInputFile">
            <p class="help-block">专题logo 64*64为最佳.</p>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
  </div>
</div>