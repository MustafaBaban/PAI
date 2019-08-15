
  <!-- Modal -->
  <div class="modal fade" id="attributeModal" tabindex="-1" role="dialog" aria-labelledby="attributeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Create Attribute</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/scenario/{{$scenario->id}}/attribute" method="POST">
                    
                  @csrf
    
                    <input type="hidden" name="scenario_id" value="{{$scenario->id}}" class="form-control" >
                  <input type="text" name="name" class="form-control" >
    
    
                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Attribute</button>
                </form>
            </div>
          </div>
        </div>
      </div>