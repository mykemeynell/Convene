import EditorJS from '@editorjs/editorjs';
import ImageTool from '@editorjs/image';
import InlineCode from '@editorjs/inline-code';
import Header  from '@editorjs/header';
import Embed from '@editorjs/embed';
import CodeTool from '@editorjs/code';
import Warning from '@editorjs/warning';

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
                endpoints: {
                    byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
                    byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
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
        }
    }
});

editor.isReady
    .then(() => {
        console.log('Editor.js is ready to work!');
        /** Do anything you need after editor initialization */
    })
    .catch((reason) => {
        console.log(`Editor.js initialization failed because of ${reason}`);
    });

$('#js-save-page-button').on('click', (event) => {
    event.preventDefault();

    editor.save().then((outputData) => {
        console.log('Article data: ', outputData);

        axios.post($('#space-page-form').attr('action'), {
            'page': outputData
        });
    }).catch((error) => {
        console.log('Saving failed: ', error);
    });
});
