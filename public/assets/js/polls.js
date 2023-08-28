
// Event listener untuk menangkap klik tombol "like".
$('.btn-like').on('click', function (event) {
    event.preventDefault(); // Mencegah perilaku default dari tautan ketika diklik (misalnya, mengarahkan ke URL).
    var pollId = $(this).data('poll-id'); // Mendapatkan nilai "poll-id" dari data atribut tombol yang diklik.
    doAction('like', pollId); // Memanggil fungsi "doAction" dengan parameter "action" sebagai 'like' dan "pollId" sesuai nilai yang didapatkan dari tombol.
});

// Event listener untuk menangkap klik tombol "dislike".
$('.btn-dislike').on('click', function (event) {
    event.preventDefault(); // Mencegah perilaku default dari tautan ketika diklik (misalnya, mengarahkan ke URL).
    var pollId = $(this).data('poll-id'); // Mendapatkan nilai "poll-id" dari data atribut tombol yang diklik.
    doAction('dislike', pollId); // Memanggil fungsi "doAction" dengan parameter "action" sebagai 'dislike' dan "pollId" sesuai nilai yang didapatkan dari tombol.
});
