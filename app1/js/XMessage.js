/**
Copyright (c) 2008 Ângelo Ayres Camargo <uacaman at gmail.com>

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/
var XMessageDialog = Class.create();
var XMessageIdTimeOut = null;

Object.extend(XMessageDialog.prototype,
{
    initialize: function () {

        this.idTimeOut = null;
        this.container = new Element('div', { 'id': 'XMessage', 'class': 'XMessage' });
        this.container.update('<div></div>');
        this.container.hide();
        document.body.appendChild(this.container);

        Event.observe(this.container, 'click', this.hide.bindAsEventListener(this));
        Event.observe(this.container, 'mouseover', this.over.bindAsEventListener(this));
        Event.observe(this.container, 'mouseout', this.out.bindAsEventListener(this));

    },

    show: function (params) {
        this.hide();

        this.options = Object.extend({
            text: ''
        }, params);

        this.container.setStyle('height:50px');
        this.container.update('<div>' + this.options.text + '</div>');

        new Effect.Parallel(
         [
         new Effect.Appear('XMessage', { sync: true, duration: 0.4, from: 0, to: 1, queue: { scope: 'XMessage', position: 'end'} }),
         new Effect.SlideDown('XMessage', { sync: true, duration: 0.4, queue: { scope: 'XMessage', position: 'end'} })
         ],
         { duration: 0.4 }
         );

        if (this.idTimeOut !== null) {
            clearTimeout(this.idTimeOut);
        }
        this.idTimeOut = window.setTimeout(this.hide.bind(this), 1000 * 10);
    },

    cancelar: function () {
        var queue = Effect.Queues.get('XMessage');
        queue.each(function (effect) { effect.cancel(); });
    },

    over: function () {
        if (this.idTimeOut !== null) {
            clearTimeout(this.idTimeOut);
        }

    },

    out: function () {
        this.idTimeOut = window.setTimeout(this.hide.bind(this), 1000 * 10);
    },

    hide: function () {
        if (this.idTimeOut !== null) {
            clearTimeout(this.idTimeOut);
        }
        this.cancelar();
        this.container.hide();
    }
});

var XMessage = new XMessageDialog();
