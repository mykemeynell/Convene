$('.js-open-report').on('click', function(event) {
    event.preventDefault();

    let message = $(this).data('message');
    let status = $(this).data('status');

    let title = 'Convene reported [' + status + '] ' + message;
    let body = '#### Issue details\n\n##### Environment\n<!-- Describe how you\'re running Convene.-->\n ' +
        'Convene version:\nPHP version:\nOperating system:\n' +
        '\n##### Steps to reproduce\n <!-- Describe all steps needed to reproduce the ' +
        'issue. It is a good place to use numbered list. -->\n\n##### Observed result\nConvene reported ' +
        status + '\n' + message + '\n\n#####' +
        'Expected result\n<!-- Describe expected result as precisely as possible. -->\n\n#####' +
        'Comments\n<!-- If you have any comments or more details, put them here. -->';

    let url = 'https://github.com/mykemeynell/convene/issues/new?title=' + encodeURIComponent(title) +
        '&body=' + encodeURIComponent(body);

    return window.open(url, '_blank');
});
