<table  class="table table-borderless" role="grid" aria-describedby="user-list-page-info">
                                          <thead>
                                              <tr>
                                                 <th>Time Slot</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($timeSlots as $row)
                                              @php
        										$key = $loop->index;
    											@endphp
                                                <tr>
                                                      <td>{{ $row['time_slot'] }}</td>
                                                      <td>
                                                            <span id="status{{ $key }}" @if($row['status'] == 0)class="badge iq-bg-danger" @endif @if($row['status'] == 1) class="badge dark-icon-light iq-bg-primary" @endif>
                                                         @if($row['status'] == 0) InActive @endif @if($row['status'] == 1) Active @endif</span>
                                                      </td> 
                                                       <td>
                                                         <div class="custom-control custom-switch custom-switch-color custom-control-inline">
                                                               <input type="checkbox" class="custom-control-input bg-success" id="customSwitch{{ $key }}" name="slot[]" 
                                                               @if($row['status'] == 0)
                                                               value="0" @endif  @if($row['status'] == 1)
                                                               value="1" checked @endif onclick="switch_collapse(this)"
                                                               >
                                                               <label class="custom-control-label" for="customSwitch{{ $key }}"></label>
                                                         </div>
                                                         <input type="hidden" id="customSwitchInput{{ $key }}" name="slot1[]" @if($row['status'] == 0) value="0" @endif @if($row['status'] == 1) value="1" @endif>
                                                         
                                                         
                                                         
                                                      </td> 
                                                </tr>
                                             @endforeach
                                          </tbody>
                                        </table>
                                        <input type="hidden" name="action" value="update" id='action'>
                                        <button id="updateButton" type="submit" class="btn btn-primary">Update slots</button>