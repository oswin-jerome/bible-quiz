@extends('layout.app')

@section('content')
    <div>
        <div id="qlist">

        </div>
    </div>

    <script>
        var questionList = document.getElementById('qlist');
       
        $.get('/api/questions',(data)=>{
            JSON.parse(data).forEach(element => {
                var qcard = document.createElement('div')
                var s = document.createElement('h1')
                s.innerText=element['question'];

                var quex = document.createElement('div')

                element['options'].forEach(element => {
                    var l = document.createElement('div')
                    var opt = document.createElement('input')
                    opt.type="radio";
                    opt.value=1,
                    opt.name=element['id']


                    var t = document.createElement('span')
                    t.innerText = element;


                    l.appendChild(opt)
                    l.appendChild(t)
                    
                    quex.appendChild(l);
                });

                qcard.appendChild(s)
                qcard.appendChild(quex)
                questionList.appendChild(qcard)
            });
        })
    </script>
@endsection