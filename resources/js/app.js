/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./GitHubIssueReport');
require('./sb-admin-2.min');
require('./includes/toast');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#wrapper',
// });

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
            config: {
                placeholder: 'Enter a header'
            }
        },
        inlineCode: {
            class: InlineCode,
            shortcut: 'CMD+SHIFT+M',
        },
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
                    byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
                }
            }
        },
        warning: {
            class: Warning,
            inlineToolbar: true,
            shortcut: 'CMD+SHIFT+W',
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
