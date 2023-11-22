


<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  // This is a CodeSandbox injection script that's used to
  // add navigation and inspector functionality to the preview
  (function () {
    var script = document.createElement("script");
    script.src = "https://codesandbox.io/p/preview-protocol.js";
    script.defer = true;
    script.async = true;
    (document.body || document.documentElement).appendChild(script);
  })();

  const isIFramePreview = window.top !== window.self;

  // Only run this script in editor context
  if (isIFramePreview) {
    // This script is used to enable Chrome DevTools functionality
    (function () {
      var script = document.createElement("script");
      script.src =
        "https://codesandbox.io/p/chrome-devtool/protocol/index.js";

      script.onload = () => {
        const devtoolProtocol = window.chobitsu;
        if (devtoolProtocol) {
          window.addEventListener("message", (event) => {
            const { type, data } = event.data;

            if (type === "FROM_DEVTOOL") {
              devtoolProtocol.sendRawMessage(data);
            }
          });

          devtoolProtocol.setOnMessage((data) => {
            if (data.includes('"id":"tmp')) {
              return;
            }

            window.parent.postMessage({ type: "TO_DEVTOOL", data }, "*");
          });

          devtoolProtocol.sendRawMessage(
            `{"id":5,"method":"Runtime.enable","params":{}}`
          );
        }        
      }

      (document.head || document.documentElement).prepend(script);
    })();
  }

  if (typeof __REACT_DEVTOOLS_GLOBAL_HOOK__ === "undefined") {
    let nextID = 0;
    let hook = (__REACT_DEVTOOLS_GLOBAL_HOOK__ = {
      renderers: new Map(),
      supportsFiber: true,
      inject: (renderer) => {
        const id = nextID++;
        hook.renderers.set(id, renderer);
        return id;
      },
      onScheduleFiberRoot() {},
      onCommitFiberRoot() {},
      onCommitFiberUnmount() {},
    });
  }

  document.currentScript.remove();
</script>
    <title>Simple Form Checker</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="myText01">Enter Text:</label>
        <input type="text" id="myText01" name="myText01">
        <input type="submit" value="Submit">
    </form>
    <span style='color:red'> Try the magic word</span></body>
</html>
