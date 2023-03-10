        var rupiah = document.getElementById('rupiah');
        var rupiah2 = document.getElementById('rupiah2');
        var rupiah3 = document.getElementById('rupiah3');
        rupiah2.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatrupiah2() untuk mengubah angka yang di ketik menjadi format angka
            document.getElementById('rupiah3').value = rupiah.value*rupiah2.value;
            rupiah2.value = formatrupiah2(this.value,);
            
        });
 
        /* Fungsi formatrupiah2 */
        function formatrupiah2(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah2          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah2 += separator + ribuan.join('.');
            }
 
            rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
            return prefix == undefined ? rupiah2 : (rupiah2 ? 'Rp. ' + rupiah2 : '');
        }
