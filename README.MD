# How to Add Alpinejs to Custom Gutenberg Blocks

Is there a fun/easy/lightweight way to add frontend interactivity to custom Gutenberg blocks w/o using React or jQuery? 🤔

Yes!👇

@Alpine_JS (16.3kb gzipped)

Spread [alpinejs](https://alpinejs.dev/) directives into a custom block's save() function:

```javascript
save() {
return (
 <div
  { ...useBlockProps.save() }
  { ...{ 'x-data': '{ show: false }' } }
 >
  <div
   className="block"
   { ...{ ':class': `{'block': show, 'hidden': ! show }` } }
  >
   Alpinejs Example Block on the Frontend.
  </div>
  <button
   { ...{ '@click':'show = !show' } }
  >
   <span
    className="hidden"
    { ...{ ':class': `{'hidden': show, 'block': ! show }` } }
   >Show Text</span>
   <span
    className="block"
    { ...{ ':class': `{'block': show, 'hidden': ! show }` } }
   >Hide Text</span>
  </button>
 </div>
);
```

## Try it out

Run the commands below to fire up a server and test it out.

* requires Docker, Nodejs

```bash
git clone https://github.com/blockhandbook/alpine.git

npm install

npm run build

npm run server:start

npm start
```
