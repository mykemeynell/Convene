import EditorJS from '@editorjs/editorjs';
import ImageTool from '@editorjs/image';
import InlineCode from '@editorjs/inline-code';
import Header  from '@editorjs/header';
import Embed from '@editorjs/embed';
import CodeTool from '@editorjs/code';
import Warning from '@editorjs/warning';
import LinkTool from '@editorjs/link';
import Table from '@editorjs/table';
import List from '@editorjs/list';

let dataContainer = $('#editor-data');
let initialData = "";
if(dataContainer.length === 1) {
    initialData = {'blocks': $.parseJSON(dataContainer.val())};
} else {
    initialData = {};
}

console.log(initialData);

const editor = new EditorJS({
    /**
     * Id of Element that should contain Editor instance
     */
    holder: 'codex-editor',

    /**
     * Available Tools list.
     * Pass Tool's class or Settings object for each Tool you want to use
     */
    tools: {
        embed: {
            class: Embed,
            shortcut: 'CMD+ALT+E',
            code: CodeTool,
            config: {
                services: {
                    youtube: true,
                    coub: true
                }
            }
        },
        header: {
            class: Header,
            shortcut: 'CMD+ALT+H',
            config: {
                placeholder: 'Enter a header'
            }
        },
        inlineCode: {
            shortcut: 'CMD+ALT+C',
            class: InlineCode,
        },
        image: {
            class: ImageTool,
            shortcut: 'CMD+ALT+I',
            config: {
                additionalRequestHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                endpoints: {
                    byFile: '/api/uploadFile'
                }
            }
        },
        warning: {
            shortcut: 'CMD+ALT+W',
            class: Warning,
            inlineToolbar: true,
            config: {
                titlePlaceholder: 'Title',
                messagePlaceholder: 'Message',
            },
        },
        linkTool: {
            class: LinkTool,
            config: {
                endpoint: '/api/fetch', // Your backend endpoint for url data fetching
            }
        },
        table: {
            class: Table,
            inlineToolbar: true,
            config: {
                rows: 1,
                cols: 1,
            },
        },
        list: {
            class: List,
            inlineToolbar: true,
        }
    },
    data: initialData
});

editor.isReady
    .then(() => {
        console.log('Editor.js is ready to work!');
        /** Do anything you need after editor initialization */
    })
    .catch((reason) => {
        console.log(`Editor.js initialization failed because of ${reason}`);
    });

$('#js-save-page-button, #js-save-exit-page-button').on('click', function (event) {
    event.preventDefault();
    let _this = $(this);

    editor.save().then((outputData) => {
        console.log('Article data: ', outputData);

        axios.post($('#space-page-form').val(), {
            'page': outputData
        }).then((response) => {
            console.log('Save response:', response);
            if(_this.attr('id') === 'js-save-exit-page-button') {
                window.location.href = response.data.data.url;
                return false;
            }
        }).catch((error) => {
            toaster({
                'title': 'Failed to save data',
                'message': error.response.data.message
            }).pop();
        });
    }).catch((error) => {
        toaster({
            'title': 'Failed to save data',
            'message': error
        }).pop();
    });
});
