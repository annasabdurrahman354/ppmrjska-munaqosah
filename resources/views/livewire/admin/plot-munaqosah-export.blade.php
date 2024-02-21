<div>
   @if (!$isAddPlotBaru && !$isIngatkanMunaqosah)
   <div>
      <p><a id="download" href="#">Download PDF</a></p>
   </div>   
   @endif
   <div>
   @if (!$isIngatkanMunaqosah)
         <button wire:click="toggleIsAddPlotBaru">{{$isAddPlotBaru ? "Batalkan Plotingan Baru" : "Tambahkan Plotingan Baru"}}</button>
         @if ($isAddPlotBaru && $plotMunaqosahBaru != null)
            <button wire:click="savePlotBaru">Simpan Plotingan Baru</button>
         @endif
   @endif
   @if (!$isAddPlotBaru)
         <button wire:click="toggleIsIngatkanMunaqosah">{{$isIngatkanMunaqosah ? "Selesai" : "Ingatkan Munaqosah"}}</button>
   @endif
   </div>
   <div id="print" class="print">
         <center>
            <h3>PLOTINGAN MUNAQOSAH</h3>
         </center>
         <p style="text-align: center; margin-top: -8pt">Diperbarui: {{now()}}</p>
         
         @foreach(json_decode($semuaJadwalMunaqosah) as $angkatan => $array_materi)
            @foreach($array_materi as $materi)
               <br>
               <p style="margin-top: 10pt; margin-bottom: -10pt; font-size: 12pt; font-weight: bold;">Kelas {{$angkatan}}</p>
               <p style="margin-bottom: -10pt;">- Materi Makna: {{$materi->materi." (".$materi->keterangan.")"}}</p>
               <p style="margin-bottom: -10pt;">- Hafalan: {{($materi->hafalan == "" ? "Tidak ada" : $materi->hafalan)}}</p>
               <p style="margin-bottom: 5pt;">- Dewan Guru: {{($materi->dewan_guru == "" ? "Tidak ada" : $materi->dewan_guru)}}</p>
               <table style="width: 100%" border="1">
               @foreach(($materi->jadwal_munaqosahs) as $jadwalMunaqosah)
                  <tr>
                     <td>
                        <div style="font-size: 10pt; font-weight: bold;">{{$jadwalMunaqosah->sesi}}</div>                           
                     </td>
                     @for ($i = 0; $i < getMaxPlotsCount($materi->jadwal_munaqosahs); $i++)
                     <td>
                        @if (isset($jadwalMunaqosah->plots[$i]->user->name))
                           {{$jadwalMunaqosah->plots[$i]->user->name}}
                           @if ($isIngatkanMunaqosah)
                              <a href="{{ ingatkanMunaqosah($jadwalMunaqosah, $materi, $jadwalMunaqosah->plots[$i]->user->telepon)}}">
                                 Ingatkan
                              </a>
                           @endif
                        @elseif (!isset($jadwalMunaqosah->plots[$i]->user->name) && $isAddPlotBaru)
                           <select class="form-control" id="user-{{strval($jadwalMunaqosah->id).strval($i)}}" name="user-{{strval($jadwalMunaqosah->id).strval($i)}}"
                              wire:model="selectedUser.{{$angkatan}}.{{$materi->id}}.{{$jadwalMunaqosah->id}}.{{$i}}"
                              wire:change="addPlotBaru({{$angkatan}}, {{$materi->id}}, {{$jadwalMunaqosah->id}}, {{$i}})"
                           >
                              <option value="">Pilih santri...</option>
                              @foreach($this->listsForFields['user'][$angkatan][$materi->id] as $key => $user)
                              <option value="{{$key}}">{{$user}}</option>
                              @endforeach
                           </select>
                        @elseif (!isset($jadwalMunaqosah->plots[$i]->user->name) && !$isAddPlotBaru)
                           -
                        @endif
                     </td>
                     @endfor
                  </tr>
               @endforeach
               </table>
            @endforeach 
         <div class="page_break" style="page-break-before: always;" wire:ignore></div>
      @endforeach 
   </div>
</div>

@push('scripts')
<script type="text/javascript" src="{{ URL::asset('js/html2canvas.min.js') }}"></script>
<script>
   document.addEventListener("DOMContentLoaded", () => {
         Livewire.hook('message.processed', (message, component) => {
            transposeTable();
         })
   });

   $(document).ready(function(){
      transposeTable();
      var elems = document.querySelectorAll(".page_break");
      var len = elems.length;
      var lastelement = len < 1 ? "" : elems[len-1];
      lastelement.remove();
   });
   
   $("#download").click(function(){
      document.getElementById("download").style.display = "none";
      var container = document.getElementById("print");
		html2canvas(document.querySelector("#print"),{
         scale: 2,
         windowWidth: 1080
      }).then(canvas => {
         a = document.createElement('a'); 
         document.body.appendChild(a); 
         a.download = "plotingan_munaqosah.png"; 
         a.href =  canvas.toDataURL();
         a.click();
      });	 
   });

   function transposeTable(){
      $("table").each(function() {
         var $this = $(this);
         var newrows = [];
         $this.find("tr").each(function(){
            var i = 0;
            $(this).find("td").each(function(){
                  i++;
                  if(newrows[i] === undefined) { newrows[i] = $("<tr></tr>"); }
                  newrows[i].append($(this));
            });
         });
         $this.find("tr").remove();
         $.each(newrows, function(){
            $this.append(this);
         });
      });
      var styles = {
         padding:"5px",
         border:"1px solid #ccc"
      };
      $("td").css(styles);
   }
</script>
@endpush
