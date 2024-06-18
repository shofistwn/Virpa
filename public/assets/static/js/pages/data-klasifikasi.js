let lastData = [];

function isDataChanged(newData) {
  return JSON.stringify(lastData) !== JSON.stringify(newData);
}

function formatNumber(number, satuan = '') {
  if (number === null || number === undefined || number == 0) {
    return '-';
  }

  let numberStr = number.toString();

  if (numberStr.indexOf('.') !== -1) {
    numberStr = numberStr.replace(/\.?0+$/, '');
  }

  return `${numberStr} ${satuan}`;
}

function fetchData() {
  $.ajax({
    url: `${base_url}admin/ajax-klasifikasi`,
    method: 'GET',
    dataType: 'json',
  }).done(function (data) {
    if (!isDataChanged(data.data)) {
      return;
    }

    lastData = data.data;

    if ($.fn.DataTable.isDataTable('#table1')) {
      $('#table1').DataTable().destroy();
    }

    if ($.fn.DataTable.isDataTable('#table2')) {
      $('#table2').DataTable().destroy();
    }

    let jquery_datatable = $("#table1").DataTable({
      responsive: true,
      data: data.data,
      columns: [
        { "data": null, "render": (data, type, row, meta) => meta.row + 1 },
        { "data": "jenis_kelamin", "render": data => data === 'L' ? 'Laki-laki' : data === 'P' ? 'Perempuan' : '-' },
        { "data": "umur", "render": data => formatNumber(data, 'bulan') },
        { "data": "lingkar_kepala", "render": data => formatNumber(data, 'cm') },
        { "data": "berat_badan", "render": data => formatNumber(data, 'kg') },
        { "data": "tinggi_badan_cm", "render": data => formatNumber(data, 'cm') },
        { "data": "tinggi_badan_m", "render": data => formatNumber(data, 'm') },
        { "data": "imt", "render": data => formatNumber(data) },
        { "data": "imt", "render": data => '-' },
        { "data": "imt", "render": data => '-' },
        { "data": "imt", "render": data => '-' },
        { "data": "status_gizi", "render": data => data ?? '-' },
        {
          "data": "id_klasifikasi",
          "render": data => `
                        <a href="${base_url}admin/proses-klasifikasi/edit?id=${data}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger delete-btn" data-id="${data}">Delete</a>
                    `
        }
      ]
    });

    let customized_datatable = $("#table2").DataTable({
      responsive: true,
      pagingType: 'simple',
      dom: "<'row'<'col-3'l><'col-9'f>>" +
        "<'row dt-row'<'col-sm-12'tr>>" +
        "<'row'<'col-4'i><'col-8'p>>",
      language: {
        info: "Page _PAGE_ of _PAGES_",
        lengthMenu: "_MENU_ ",
        search: "",
        searchPlaceholder: "Search.."
      }
    });

    const setTableColor = () => {
      document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
        dt.classList.add('pagination-primary');
      });
    };
    setTableColor();
    jquery_datatable.on('draw', setTableColor);
  });
}

fetchData();

setInterval(fetchData, 5000);

$('#table1').on('click', '.delete-btn', function(e) {
  e.preventDefault();
  let deleteUrl = `${base_url}admin/proses-klasifikasi/delete?id=${$(this).data('id')}`;
  if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    window.location.href = deleteUrl;
  }
});