from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED
root = Path(__file__).resolve().parents[1]
out = root / 'releases'
out.mkdir(exist_ok=True)
for parent, name in [('theme','ote-dance'),('plugin','ote-content')]:
    with ZipFile(out / f'{name}.zip', 'w', ZIP_DEFLATED) as z:
        for p in sorted((root / parent / name).rglob('*')):
            if p.is_file(): z.write(p, p.relative_to(root / parent).as_posix())
    print(out / f'{name}.zip')
