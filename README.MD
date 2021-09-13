# Add Alpinejs to Custom Gutenberg Blocks

Is there a fun/easy/lightweight way to add frontend interactivity to custom Gutenberg blocks w/o using React or jQuery? 🤔

Yes!👇

@Alpine_JS (16.3kb gzipped)

Spread [alpinejs](https://alpinejs.dev/) directives into a custom block's save() function:
![A custom Gutenberg block save() function.](https://blockhandbook.com/wp-content/uploads/2021/09/Screen-Shot-2021-09-13-at-1.11.07-PM.png)

Need more context?  Here's the code:

## Try it out

Run the commands below to fire up a server and test it out.

* requires Docker, Nodejs

```bash
git clone https://github.com/blockhandbook/alpine.git

npm install

npm run build

npm run server:start

npm start```
