

<table  class="table table-borderless" role="grid" aria-describedby="user-list-page-info">
                                          <thead>
                                              <tr>
                                                 <th>Time Slot</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($timeSlots as $key => $slot)
                                                <tr>
                                                      <td>{{ $slot }}</td>
                                                       <td>
                                                            <span id="status{{ $key }}" class="badge iq-bg-danger">Inactive</span>
                                                      </td> 
                                                      <td>
                                                         <div class="custom-control custom-switch custom-switch-color custom-control-inline">
                                                               <input type="checkbox" class="custom-control-input bg-success" id="customSwitch{{ $key }}" name="slot[]" value="0" onclick="switch_collapse(this)">
                                                               <label class="custom-control-label" for="customSwitch{{ $key }}"></label>
                                                         </div>
                                                         <input type="hidden" id="customSwitchInput{{ $key }}" name="slot1[]" value="0">
                                                      </td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                        </table>
                                        <input type="hidden" name="action" value="insert" id='action'>
                                        <button id="submitButton" type="submit" class="btn btn-primary ">Add slots </button>

